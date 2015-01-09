<?php
// class Sitemap Generator
class SitemapGenerator {
    public $sitemapFileName = "sitemap.xml";
    public $sitemapIndexFileName = "sitemap-index.xml";
    public $robotsFileName = "robots.txt";
    public $maxURLsPerSitemap = 50000;
    public $createGZipFile = false;
    private $baseURL;
    private $basePath;
    private $classVersion = "1.2.0";
    private $searchEngines = array(
        array("http://search.yahooapis.com/SiteExplorerService/V1/updateNotification?appid=USERID&url=",
        "http://search.yahooapis.com/SiteExplorerService/V1/ping?sitemap="),
        "http://www.google.com/webmasters/tools/ping?sitemap=",
        "http://submissions.ask.com/ping?sitemap=",
        "http://www.bing.com/webmaster/ping.aspx?siteMap="
    );
    private $urls;
    private $sitemaps;
    private $sitemapIndex;
    private $sitemapFullURL;
    public function __construct($baseURL, $basePath = "../") {
        $this->baseURL = $baseURL;
        $this->basePath = $basePath;
    }
    public function addUrls($urlsArray) {
        if (!is_array($urlsArray))
            throw new InvalidArgumentException("Array as argument should be given.");
        foreach ($urlsArray as $url) {
            $this->addUrl(isset ($url[0]) ? $url[0] : null,
                isset ($url[1]) ? $url[1] : null,
                isset ($url[2]) ? $url[2] : null,
                isset ($url[3]) ? $url[3] : null);
        }
    }
    public function addUrl($url, $lastModified = null, $changeFrequency = null, $priority = null) {
        if ($url == null)
            throw new InvalidArgumentException("URL is mandatory. At least one argument should be given.");
        $urlLenght = extension_loaded('mbstring') ? mb_strlen($url) : strlen($url);
        if ($urlLenght > 2048)
            throw new InvalidArgumentException("URL lenght can't be bigger than 2048 characters.
                                                Note, that precise url length check is guaranteed only using mb_string extension.
                                                Make sure Your server allow to use mbstring extension.");
        $tmp = array();
        $tmp['loc'] = $url;
        if (isset($lastModified)) $tmp['lastmod'] = $lastModified;
        if (isset($changeFrequency)) $tmp['changefreq'] = $changeFrequency;
        if (isset($priority)) $tmp['priority'] = $priority;
        $this->urls[] = $tmp;
    }
    public function createSitemap() {
        if (!isset($this->urls))
            throw new BadMethodCallException("To create sitemap, call addUrl or addUrls function first.");
        if ($this->maxURLsPerSitemap > 50000)
            throw new InvalidArgumentException("More than 50,000 URLs per single sitemap is not allowed.");

        $generatorInfo = '<!-- generator="SitemapGenerator/'.$this->classVersion.'" -->
                          <!-- sitemap-generator-url="http://maelosoki.com" -->
                          <!-- generated-on="'.date('c').'" -->';
        $sitemapHeader = '<?xml version="1.0" encoding="UTF-8"?>'.$generatorInfo.'
                            <urlset
                                xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                                xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
                                http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd"
                                xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
                         </urlset>';
        $sitemapIndexHeader = '<?xml version="1.0" encoding="UTF-8"?>'.$generatorInfo.'
                                <sitemapindex
                                    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                                    xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
                                    http://www.sitemaps.org/schemas/sitemap/0.9/siteindex.xsd"
                                    xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
                              </sitemapindex>';
        foreach(array_chunk($this->urls,$this->maxURLsPerSitemap) as $sitemap) {
            $xml = new SimpleXMLElement($sitemapHeader);
            foreach($sitemap as $url) {
                $row = $xml->addChild('url');
                $row->addChild('loc',htmlspecialchars($url['loc'],ENT_QUOTES,'UTF-8'));
                if (isset($url['lastmod'])) $row->addChild('lastmod', $url['lastmod']);
                if (isset($url['changefreq'])) $row->addChild('changefreq',$url['changefreq']);
                if (isset($url['priority'])) $row->addChild('priority',$url['priority']);
            }
            if (strlen($xml->asXML()) > 10485760)
                throw new LengthException("Sitemap size is more than 10MB (10,485,760),
                    please decrease maxURLsPerSitemap variable.");
            $this->sitemaps[] = $xml->asXML();

        }
        if (sizeof($this->sitemaps) > 1000)
            throw new LengthException("Sitemap index can contains 1000 single sitemaps.
                Perhaps You trying to submit too many URLs.");
        if (sizeof($this->sitemaps) > 1) {
            for($i=0; $i<sizeof($this->sitemaps); $i++) {
                $this->sitemaps[$i] = array(
                    str_replace(".xml", ($i+1).".xml.gz", $this->sitemapFileName),
                    $this->sitemaps[$i]
                );
            }
            $xml = new SimpleXMLElement($sitemapIndexHeader);
            foreach($this->sitemaps as $sitemap) {
                $row = $xml->addChild('sitemap');
                $row->addChild('loc',$this->baseURL.htmlentities($sitemap[0]));
                $row->addChild('lastmod', date('c'));
            }
            $this->sitemapFullURL = $this->baseURL.$this->sitemapIndexFileName;
            $this->sitemapIndex = array(
                $this->sitemapIndexFileName,
                $xml->asXML());
        }
        else {
            if ($this->createGZipFile)
                $this->sitemapFullURL = $this->baseURL.$this->sitemapFileName.".gz";
            else
                $this->sitemapFullURL = $this->baseURL.$this->sitemapFileName;
            $this->sitemaps[0] = array(
                $this->sitemapFileName,
                $this->sitemaps[0]);
        }
    }
    public function toArray() {
        if (isset($this->sitemapIndex))
            return array_merge(array($this->sitemapIndex),$this->sitemaps);
        else
            return $this->sitemaps;
    }
    public function writeSitemap() {
        if (!isset($this->sitemaps))
            throw new BadMethodCallException("To write sitemap, call createSitemap function first.");
        if (isset($this->sitemapIndex)) {
            $this->_writeFile($this->sitemapIndex[1], $this->basePath, $this->sitemapIndex[0]);
            foreach($this->sitemaps as $sitemap) {
                $this->_writeGZipFile($sitemap[1], $this->basePath, $sitemap[0]);
            }
        }
        else {
            $this->_writeFile($this->sitemaps[0][1], $this->basePath, $this->sitemaps[0][0]);
            if ($this->createGZipFile)
                $this->_writeGZipFile($this->sitemaps[0][1], $this->basePath, $this->sitemaps[0][0].".gz");
        }
    }
    public function updateRobots() {
        if (!isset($this->sitemaps))
            throw new BadMethodCallException("To update robots.txt, call createSitemap function first.");
        $sampleRobotsFile = "User-agent: *\nAllow: /";
        if (file_exists($this->basePath.$this->robotsFileName)) {
            $robotsFile = explode("\n", file_get_contents($this->basePath.$this->robotsFileName));
            $robotsFileContent = "";
            foreach($robotsFile as $key=>$value) {
                if(substr($value, 0, 8) == 'Sitemap:') unset($robotsFile[$key]);
                else $robotsFileContent .= $value."\n";
            }
            $robotsFileContent .= "Sitemap: $this->sitemapFullURL";
            if ($this->createGZipFile && !isset($this->sitemapIndex))
                $robotsFileContent .= "\nSitemap: ".$this->sitemapFullURL.".gz";
            file_put_contents($this->basePath.$this->robotsFileName,$robotsFileContent);
        }
        else {
            $sampleRobotsFile = $sampleRobotsFile."\n\nSitemap: ".$this->sitemapFullURL;
            if ($this->createGZipFile && !isset($this->sitemapIndex))
                $sampleRobotsFile .= "\nSitemap: ".$this->sitemapFullURL.".gz";
            file_put_contents($this->basePath.$this->robotsFileName, $sampleRobotsFile);
        }
    }
    public function submitSitemap($yahooAppId = null) {
        if (!isset($this->sitemaps))
            throw new BadMethodCallException("To submit sitemap, call createSitemap function first.");
        if (!extension_loaded('curl'))
            throw new BadMethodCallException("cURL library is needed to do submission.");
        $searchEngines = $this->searchEngines;
        $searchEngines[0] = isset($yahooAppId) ? str_replace("USERID", $yahooAppId, $searchEngines[0][0]) : $searchEngines[0][1];
        $result = array();
        for($i=0;$i<sizeof($searchEngines);$i++) {
            $submitSite = curl_init($searchEngines[$i].htmlspecialchars($this->sitemapFullURL,ENT_QUOTES,'UTF-8'));
            curl_setopt($submitSite, CURLOPT_RETURNTRANSFER, true);
            $responseContent = curl_exec($submitSite);
            $response = curl_getinfo($submitSite);
            $submitSiteShort = array_reverse(explode(".",parse_url($searchEngines[$i], PHP_URL_HOST)));
            $result[] = array("situs"=>$submitSiteShort[1].".".$submitSiteShort[0],
                "url"=>$searchEngines[$i].htmlspecialchars($this->sitemapFullURL, ENT_QUOTES,'UTF-8'),
                "http_code"=>$response['http_code'],
                "pesan"=>str_replace("\n", " ", strip_tags($responseContent)));
        }
        return $result;
    }
    private function _writeFile($content, $filePath, $fileName) {
        $file = fopen($filePath.$fileName, 'w');
        fwrite($file, $content);
        return fclose($file);
    }
    private function _writeGZipFile($content, $filePath, $fileName) {
        $file = gzopen($filePath.$fileName, 'w');
        gzwrite($file, $content);
        return gzclose($file);
    }
}
?>