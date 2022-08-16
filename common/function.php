<?php
set_include_path('/home/mahacet1/public_html/dataware/cron/trend/');
require 'autoload.php';
ini_set('display_errors',0);

use Google\GTrends;

class common {

    function getCSE($html,$song,$count) {
            $api = 'AIzaSyCmyWGvFP-PK-yZZofJO6NNm3QGHkYn4Jw';
            $song = $song;    
            $useragent = "Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36";
            $ch = curl_init();
            curl_setopt ($ch, CURLOPT_URL, "https://customsearch.googleapis.com/customsearch/v1?cx=ac2eff797d0b28f62&q=$song&safe=active&key=$api");
            curl_setopt ($ch, CURLOPT_USERAGENT, $useragent); // set user agent
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        
            
            //curl_setopt($ch, CURLOPT_HTTPHEADER, $header); 
            curl_setopt($ch, CURLOPT_REFERER, 'https://www.google.com'); 
            //curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate'); 
            //curl_setopt($ch, CURLOPT_AUTOREFERER, true); 
            $output = curl_exec ($ch);
          
            curl_close($ch);
             // Load HTML from a string
            //$html->load($output);
            $search = json_decode($output);
    
            $search_array = $search->items;
            if(count($search_array) > 0) {
                foreach ($search_array as $k=>$searchObj) {
                       $searchObj->title = $this->adsense_not_allowed($searchObj->title);
                       $urls[$searchObj->title] = $searchObj->link;
                       $urls_desc[$searchObj->title] = $searchObj->snippet;
                } 
            }
           $urls = array_slice($urls, 0, $count);
           return array($urls,$urls_desc);
        
    }
    
    function getYoutubeData($keyword)  {
        $apikey = 'AIzaSyBcnLQu3HZVbWMoKY21AzXbUJncCTXQ2bQ'; 
        define("MAX_RESULTS", 2);
        
        $googleApiUrl = 'https://www.googleapis.com/youtube/v3/search?part=snippet&q=' . $keyword . '&maxResults=' . MAX_RESULTS . '&key=' . $apikey;
        $ch = curl_init();
      
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
    
        curl_close($ch);
        $data = json_decode($response);
        return json_decode(json_encode($data), true);
        
    }
    
    function adsense_not_allowed($word) {
        $words_not_allowed = array('downloads','download','movies','movie','song','age','injury','accident','drug','drugs','image','images','nudity','nude','breasts','buttocks','crotches',
        'see-through','sexual','sex','censored','undress','seductive','voyeurism', 'role-playing', 'bondage', 'dominance','submission', 'sadomasochism', 'pornographic', 'adult',
        'webcam','strip','accident','accidents','lottery','incite','hatred','acrimony','alienationanimosity','animus','antagonism','antipathy','bitterness','contempt','disgust','dislike','distaste',
        'enmity','envy','grudge','hate','horror','hostility','ill','loathing','malice','prejudice','rancor','revenge','revulsion','abhorrence','abomination','aversion','coldness',
        'detestation','disapproval','disfavor','displeasure','execration','ignominy','malevolence','malignance','militancy','odium','pique','repugnance','repulsion','scorn','spite','spleen',
        'venom','allergy','hard','attack','ambuscade','ambush','counteraggression','counterassault','counterattack','counteroffensive','counterstrike','sally','sortie','envelopment','flanking',
        'breakthrough','foray','incursion','invasionpillage','ravage','sack','air','raid','bombardment','bombing','siege','storm','barrage','cannonade','fusillade','hail','salvo','volley','whammy',
        'abuse','misuse','misapply','misemploy','mishandle','exploit','pervert','maltreat','ill','treat','treat','badly','misuse','roughly','knock','around','manhandle','maul','molest','sexually',
        'sexually','assault','grope','assault','hit','strike','beat','injure','hurt','harm','damage','wrong','bully','persecute','oppress','torture','beat','rough','insultcursetaunt','shout',
        'scold','rebuke','upbraid','reprove','castigate','inveigh','against','impug','slur','revile','smear','vilify','vituperate','against','slander','libel','disparage',
        'denigrate','defame','slag','miscall','misapplication','misemployment','mishandling','exploitation','perversion','misapplication','misemployment','mishandling','exploitation',
        'perversion','insults','curses','jibes','slurs','expletives','swearing','cursing','calling','scolding','rebukes','upbraiding','reproval','invective','castigation','revilement',
        'vilification','vituperation','slander','libel','slights','disparagement','disparages','race','ethnic','origin','harasses','intimidates','religion','clerical','devout',
        'doctrinal','holy','moral','pious','sacred','sectarian','spiritual','theological','ministerial','orthodox','pietistic','pure','reverent','righteous','sacerdotal','sacrosanct',
        'saintlike','saintly','scripturaltheistic','disability','ailment','defect','impairment','infirmity','injury','lack','unfitness','weakness','harm','suicide','anhedonia','schizophrenia',
        'antidepressant','major','depressive','disorder','grief','autism','spectrum','disorder','endorphin','pain','toxic','unreality','scarification','dermatillomania','symptom','coping','burn','poison',
        'alcoholism','bulimia','attention','seeking','icd','parasuicide','perfectionism','body','tissue','phobia','substance','embedding','overdose','gender','identity','cisgender','expression',
        'fluid','genderqueer','intersex','variant','orientation','asexual','Omnisexual','Pansexual','Panromantic','polysexual','pomosexual','Passing','citizenship','ethnic','minority',
    	'tribe','clan','race','ethnos','terrorist','bomber','arsonist','incendiary','gunman','assassin','desperado','hijacker','revolutionary','urban','guerrilla','subversive','anarchistdrug','cure','medicine','narcotic',
        'pharmaceutical','pill','poison','prescription','remedy','stimulant','depressant','dope','essence','medicament','opiate','pharmaceutic','physic','sedativeton','icbiologic','medicinal','trafficking',
        'piracy','smuggling','bootlegging','crime','dealing','goods','moonshine','plunder','poaching','stuff','swag','theftviolation','counterfeiting','rum','wetbacking','Exploitative','unfair','treatment',
        'bleeding','dry','sucking','squeezing','wringing','manipulation','cheating','swindling','fleecing','victimization','enslavement','slavery','oppression','imposing','utilization','utilizing','unfair',
        'treatment','bleeding','sucking','squeezing','wringing','manipulation','feelings','youtube','live','watch','mp3','mp4','sell','sale','sales','logo','derogatory','discrimination','nationality','veteran','paraphernalia',
    	'inhuman','inferior','bullies','singling','harassment','threat','threatens','anorexia','violence','transnational','extortion','blackmail','porn','removals','cruelty','cock','fighting','endangered',
    	'election','anti-vaccine','vaccine','aids','covid-19','covid','gay','phishing','quick','concealing','misrepresenting','politics','conceal','social','hacking','cracking','illegal','copyright','descramble',
    	'streaming','videos','video','spyware','malware','software','viruses','ransomware','worms','trojan','rootkits','keyloggers','dialers','rogue','genital','masturbation','hentai',
    	'rape','incest','bestiality','necrophilia','snuff','lolita','teen-themed','dating','prostitution','escort','intimate','cuddling','mentorship','sextortion','betting','blood','gambling','pdf','kill','killed','black',
    	'crypto','cryptocurrency','bloodshed','trading');
    
        $singleSpace = preg_replace('!\s+!', ' ', $word);
        $words1 = explode(" ",$singleSpace);
     
        $final_word = '';
        foreach($words1 as $val) {
            $search_string = implode(" ",$words_not_allowed);
            $val = trim(strtolower($val));
            if (preg_match("~\b$val\b~", $search_string)) {
                      
            } else {
                $final_word .= $val." ";
            } 
        }
        
        $final_word = ucwords(trim($final_word));
        return $final_word;
    }
    
    function array_kshift(&$arr)
    {
      list($k) = array_keys($arr);
      $r  = array($k=>$arr[$k]);
      unset($arr[$k]);
      return $r;
    }
    
    function getRlatedTitle($title,$countryCode='IN') {
        $options = [
            'hl' => 'en-US',
            'tz' => -30,
            'geo' => $countryCode,
        ];
        /** @var Google\GTrends $gt */
        $gt = new GTrends($options);
        $word = $title;
        $google_words = $gt->getRelatedSearchQueries([$word]);
            
        $data = array();
        if(count($google_words) > 0) {
            if($google_words[$word]['default']['rankedList']) {
               foreach ($google_words[$word]['default']['rankedList'] as $keywords) {
                   if(count($keywords) > 0) {
                       foreach($keywords as $words ){
                           if(count($words) > 0) {
                               foreach($words as $word) {
                                  $data[$word['query']] = $word['formattedValue'];
                                  
                               }
                           }
                       }
                   }
               } 
            }
        }
        return $data;
    }
    
    function getDailySearchTrend($countryCode='IN') {
        $options = [
            'hl' => 'en-US',
            'tz' => -1,
            'geo' => $countryCode,
        ];
        /** @var Google\GTrends $gt */
        $gt = new GTrends($options);
        $daily_trend = $gt->getDailySearchTrends();
        // $encode_array = json_encode($daily_trend);
        
        return $daily_trend;
        

    }
    
    function getLocationInfoByIp(){
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = @$_SERVER['REMOTE_ADDR'];
        $result  = array('country'=>'', 'city'=>'');
        if(filter_var($client, FILTER_VALIDATE_IP)){
            $ip = $client;
        }elseif(filter_var($forward, FILTER_VALIDATE_IP)){
            $ip = $forward;
        }else{
            $ip = $remote;
            
        }

        $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));    
        if($ip_data && $ip_data->geoplugin_countryName != null){
            $result['country'] = $ip_data->geoplugin_countryCode;
            $result['countryName'] = $ip_data->geoplugin_countryName;
            $result['city'] = $ip_data->geoplugin_city;
        }
        return $result;
    }
    
    function translate_en_to_hi($keyword) {
        $url = 'https://translate.googleapis.com/translate_a/single?client=gtx&sl=en&tl=hi&dt=t&q='. $text .'&format=html&dj=1&source=icon&tk=467103.467103';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        //curl_setopt($ch, CURLOPT_PROXYPORT,3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
        $response = curl_exec($ch);
        $output = json_decode($response);
        //print_r($output);
        $hindi_text = $output->sentences[0]->trans;
        echo($hindi);
    }
    
    function translate_hi_to_en($keyword) {
     $googleApiUrl = 'https://translate.googleapis.com/translate_a/single?client=gtx&sl=en&tl=hi&dt=t&q='.urlencode( $keyword)  .'&format=html&dj=1&source=icon&tk=467103.467103' .urlencode( $keyword)   ;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    //curl_setopt($ch, CURLOPT_PROXYPORT,3128);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
    $response = curl_exec($ch);
    $output = json_decode($response);
    //print_r($output);
    $english = $output->sentences[0]->trans;
     echo ( $english) ;

      }

    function translate_auto_to_en($keyword) {
    
         $googleApiUrl = 'https://translate.googleapis.com/translate_a/single?client=gtx&sl=auto&tl=en&dt=t&q='. urlencode( $keyword) .'&format=html&dj=1&source=icon&tk=467103.467103';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        //curl_setopt($ch, CURLOPT_PROXYPORT,3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
        $response = curl_exec($ch);
        $output = json_decode($response);
    
        $meaning = '';
        $hindi_text_array = $output->sentences;
        if(count($hindi_text_array)) {
            foreach($hindi_text_array as $k=>$v ) {
                $meaning .= $v->orig."<br />";
                $meaning .= $v->trans."<br /><br />";
            }
        }
        if($meaning) {
            return $meaning;
        } else {
            return false;
        }
    }
    
    function tocontactus() {
        return "pravin1984@gmail.com";
    }
}  
    

?>
