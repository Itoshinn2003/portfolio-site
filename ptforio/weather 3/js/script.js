let city={
  hokkaido:[['札幌','sapporo'],['函館','hakodate'],['室蘭','muroran'],['苫小牧','tomakomai'],['小樽','otaru'],['旭川','asahikawa'],['北見','kitami'],['釧路','kushiro'],['帯広','obihiro'],['網走','abashiri'],['根室','nemuro'],['稚内','wakkanai']],
  aomori:[['青森','Aomori'],['八戸','hatinohe'],['弘前','hirosaki']],
  iwate:[['盛岡','morioka'],['奥州','ousyuu'],['一関','itinoseki']],
  miyagi:[['仙台','sendai'],['石巻','ishimaki'],['大崎','oosaki']],
  akita:[['秋田','akita'],['横手','yokote'],['大仙','daisen']],
  yamagata:[['山形','yamagata'],['鶴岡','turuoka'],['酒田','sakata']],
  fukushima:[['いわき','iwaki'],['郡山','kooriyama'],['福島','hukushima']],
  ibaraki:[['ひたちなか','hitachinaka'],['水戸','mito'],['つくば','tsukuba'],['土浦','tsuchiura']],
  tochigi:[['宇都宮','utunomiya'],['栃木','tochigi'],['小山','oyama']],
  gunma:[['高崎','takasaki'],['前橋','maebashi'],['太田','ota']],
  saitama:[['さいたま','saitama'],['川口','kawaguchi'],['川越','kawagoe']],
  chiba:[['千葉','chiba'],['船橋','funabashi'],['松戸','matsudo'],['柏','kashiwa']],
  tokyo:[['新宿','shinjuku'],['銀座','ginza'],['渋谷','sibuya']],
  kanagawa:[['横浜','yokohama'],['川崎','kawasaki'],['相模原','sagamihara']],
  niigata:[['長岡','nagaoka'],['新潟','niigata'],['上越','zyouetsu']],
  toyama:[['富山','toyama'],['高岡','takaoka'],['射水','imizu']],
  ishikawa:[['金沢','kanazawa'],['白山','hakusann'],['小松','komatsu']],
  fukui:[['福井','hukui'],['坂井','sakai'],['越前','echizenn']],
  yamanashi:[['甲府','koufu'],['甲斐','kai'],['南アルプス','minami-Alps']],
  nagano:[['長野','nagano'],['松本','matsumoto'],['上田','ueda']],
  gifu:[['岐阜','gifu'],['大垣','oogaki'],['高山','takayama']],
  shizuoka:[['静岡','shizuoka'],['浜松','hamamatsu'],['富士','huzi']],
  aichi:[['名古屋','nagoya'],['豊田','toyota'],['岡崎','okazaki']],
  mie:[['津', 'tsu'], ['四日市', 'yokkaichi'], ['伊勢', 'ise']],
  shiga:[['大津', 'otsu'], ['彦根', 'hikone'],['長浜', 'nagahama']],
  kyoto:[['京都', 'kyoto'], ['宇治', 'uji'], ['福知山', 'fukuchiyama']],
  osaka:[['大阪', 'osaka'], ['堺', 'sakai'], ['豊中', 'toyonaka']],
  hyogo:[['神戸', 'kobe'], ['姫路', 'himeji'], ['尼崎', 'amagasaki']],
  nara:[['奈良', 'nara'], ['橿原', 'kashihara'], ['生駒', 'ikoma']],
  wakayama:[['和歌山', 'wakayama'], ['田辺', 'tanabe'], ['橋本', 'hashimoto']]  ,
  tottori:[['鳥取', 'tottori'], ['米子', 'yonago'], ['倉吉', 'kurayoshi']],
  shimane:[['松江', 'matsue'], ['出雲', 'izumo'], ['浜田', 'hamada']],
  okayama:[['岡山', 'okayama'], ['倉敷', 'kurashiki'], ['津山', 'tsuyama']],
  hiroshima:[['広島', 'hiroshima'], ['福山', 'fukuyama'], ['呉', 'kure']],
  yamaguchi:[['山口', 'yamaguchi'], ['下関', 'shimonoseki'], ['宇部', 'ube']],
  tokusima:[['徳島', 'tokushima'], ['鳴門', 'naruto'], ['阿南', 'anann']],
  kagawa:[['高松', 'takamatsu'], ['丸亀', 'marugame'], ['観音寺', 'kanonji']],
  ehime:[['松山', 'matsuyama'], ['今治', 'imabari'], ['新居浜', 'niihama']],
  kochi:[['高知', 'kochi'], ['室戸', 'muroto'], ['南国', 'nankoku']],
  fukuoka:[['福岡', 'fukuoka'], ['北九州', 'kitakyushu'], ['久留米', 'kurume']],
  saga:[['佐賀', 'saga'], ['唐津', 'karatsu'], ['鳥栖', 'tosu']],
  nagasaki:[['長崎', 'nagasaki'], ['佐世保', 'sasebo'], ['島原', 'shimabara']],
  kumamoto:[['熊本', 'kumamoto'], ['八代', 'yatsushiro'], ['人吉', 'hitoyoshi']],
  oita:[['大分', 'oita'], ['別府', 'beppu'], ['中津', 'nakatsu']],
  miyazaki:[['宮崎', 'miyazaki'], ['都城', 'miyakonojo'], ['延岡', 'nobeoka']],
  kagoshima:[['鹿児島', 'kagoshima'], ['鹿屋', 'kanoya'], ['枕崎', 'makurazaki']],
  okinawa:[['那覇', 'naha'], ['宜野湾', 'ginowan'], ['石垣', 'ishigaki']],

};
let selectCity=document.getElementById('prefecture');

selectCity.addEventListener('change',function(){
  document.getElementById('city').innerHTML='';
  
    for(let i of city[selectCity.value]){
      
      document.getElementById('city').insertAdjacentHTML('afterbegin',`<option value="${i[1]}">${i[0]}</option>`)
    }

});



document.getElementById('search').addEventListener('click',function(){
    
    
    let resultBox={};
    resultBox.date=document.getElementById('date').value;
    resultBox.prefecture=document.getElementById('prefecture').value;
    resultBox.city=document.getElementById('city').value;
    
    
    console.log(resultBox);
    let dateList=[];
    fetch(`https://api.openweathermap.org/data/2.5/forecast?q=${resultBox.city}&appid=dcefe3c8fafae83c955fa77e3c6a05f9`)
        .then(response => response.json())
        .then(date => {
        
         
        for(let i=0 ; i<40;i++){
            if(date.list[i].dt_txt.includes(resultBox.date)){
            console.log(date.list[i].weather[0]);
            dateList.unshift(date.list[i]);
            }
        }
        console.log(dateList);

        let search=`<div class="b-result align-center">
        <h2 class="b-result__heading">結果</h2>
        <p class="b-result__place">${resultBox.city}  in ${resultBox.prefecture}</p>
        <p class='b-result__date'>${resultBox.date}</p>
        <div class="b-result__list align-center">
            <div class="b-result__item b-result__item_border" >
              <p class="b-result__time">0:00</p>
              <p>${dateList[7] == undefined ? '-' : dateList[7].weather[0].main == 'Clouds' ? '曇り' :dateList[7].weather[0].main == 'Snow' ? '雪' : dateList[7].weather[0].main == 'Clear' ? '晴れ': dateList[7].weather[0].main == 'Rain' ? '雨' :dateList[7].weather[0].main == 'Snow' ? '雪' :dateList[7].weather[0].main == 'Drizzle' ? 'きりさめ' : dateList[7].weather[0].main == 'Thunderstorm' ? '雷' :'荒天'} </p> 
              <p>${dateList[7] == undefined ? '-' :parseInt(dateList[7].main.temp-273)}℃</p>
            </div>
            <div class="b-result__item b-result__item_border" >
              <p class="b-result__time">3:00</p>
              <p>${dateList[6] == undefined ? '-' :dateList[6].weather[0].main== 'Clouds' ? '曇り' : dateList[6].weather[0].main == 'Snow' ? '雪' : dateList[6].weather[0].main == 'Clear' ? '晴れ': dateList[6].weather[0].main == 'Rain' ? '雨' :dateList[6].weather[0].main == 'Snow' ? '雪' :dateList[6].weather[0].main == 'Drizzle' ? 'きりさめ' : dateList[6].weather[0].main == 'Thunderstorm' ? '雷' :'荒天'}</p>
              <p>${dateList[6] == undefined ? '-' :parseInt(dateList[6].main.temp-273)}℃</p>
            </div>
            <div class="b-result__item b-result__item_border" >
              <p class="b-result__time">6:00</p>
              <p>${dateList[5] == undefined ? '-' :dateList[5].weather[0].main== 'Clouds' ? '曇り' : dateList[5].weather[0].main == 'Snow' ? '雪' : dateList[5].weather[0].main == 'Clear' ? '晴れ': dateList[5].weather[0].main == 'Rain' ? '雨' :dateList[5].weather[2].main == 'Snow' ? '雪' :dateList[5].weather[0].main == 'Drizzle' ? 'きりさめ' : dateList[5].weather[0].main == 'Thunderstorm' ? '雷' :'荒天'}</p>
              <p>${dateList[5] == undefined ? '-' :parseInt(dateList[5].main.temp-273)}℃</p>
            </div>
            <div class="b-result__item b-result__item_border" >
              <p class="b-result__time">9:00</p>
              <p>${dateList[4] == undefined ? '-' :dateList[4].weather[0].main== 'Clouds' ? '曇り' : dateList[4].weather[0].main == 'Snow' ? '雪' : dateList[4].weather[0].main == 'Clear' ? '晴れ': dateList[4].weather[0].main == 'Rain' ? '雨' :dateList[4].weather[0].main == 'Snow' ? '雪' :dateList[4].weather[0].main == 'Drizzle' ? 'きりさめ' : dateList[4].weather[0].main == 'Thunderstorm' ? '雷' :'荒天'}</p>
              <p>${dateList[4] == undefined ? '-' :parseInt(dateList[4].main.temp-273)}℃</p>
            </div>
            <div class="b-result__item b-result__item_border" >
              <p class="b-result__time">12:00</p>
              <p>${dateList[3] == undefined ? '-' :dateList[3].weather[0].main== 'Clouds' ? '曇り' : dateList[3].weather[0].main == 'Snow' ? '雪' : dateList[3].weather[0].main == 'Clear' ? '晴れ': dateList[3].weather[0].main == 'Rain' ? '雨' :dateList[3].weather[0].main == 'Snow' ? '雪' :dateList[3].weather[0].main == 'Drizzle' ? 'きりさめ' : dateList[3].weather[0].main == 'Thunderstorm' ? '雷' :'荒天'}</p>
              <p>${dateList[3] == undefined ? '-' :parseInt(dateList[3].main.temp-273)}℃</p>
            </div>
            <div class="b-result__item b-result__item_border" >
              <p class="b-result__time">15:00</p>
              <p>${dateList[2] == undefined ? '-' :dateList[2].weather[0].main== 'Clouds' ? '曇り' : dateList[2].weather[0].main == 'Snow' ? '雪' : dateList[2].weather[0].main == 'Clear' ? '晴れ': dateList[2].weather[0].main == 'Rain' ? '雨' :dateList[2].weather[0].main == 'Snow' ? '雪' :dateList[2].weather[0].main == 'Drizzle' ? 'きりさめ' : dateList[2].weather[0].main == 'Thunderstorm' ? '雷' :'荒天'}</p>
              <p>${dateList[2] == undefined ? '-' :parseInt(dateList[2].main.temp-273)}℃</p>
            </div>
            <div class="b-result__item b-result__item_border" >
              <p class="b-result__time">18:00</p>
              <p>${dateList[1] == undefined ? '-' :dateList[1].weather[0].main== 'Clouds' ? '曇り' : dateList[1].weather[0].main == 'Snow' ? '雪' : dateList[1].weather[0].main == 'Clear' ? '晴れ': dateList[1].weather[0].main == 'Rain' ? '雨' :dateList[1].weather[0].main == 'Snow' ? '雪' :dateList[1].weather[0].main == 'Drizzle' ? 'きりさめ' : dateList[1].weather[0].main == 'Thunderstorm' ? '雷' :'荒天'}</p>
              <p>${dateList[1] == undefined ? '-' :parseInt(dateList[1].main.temp-273)}℃</p>
            </div>
            <div class="b-result__item" >
              <p class="b-result__time">21:00</p>
              <p>${dateList[0] == undefined ? '-' :dateList[0].weather[0].main== 'Clouds' ? '曇り' : dateList[0].weather[0].main == 'Snow' ? '雪' : dateList[0].weather[0].main == 'Clear' ? '晴れ': dateList[0].weather[0].main == 'Rain' ? '雨' :dateList[0].weather[0].main == 'Snow' ? '雪' :dateList[0].weather[0].main == 'Drizzle' ? 'きりさめ' : dateList[0].weather[0].main == 'Thunderstorm' ? '雷' :'荒天'}</p>
              <p>${dateList[0] == undefined ? '-' :parseInt(dateList[0].main.temp-273)}℃</p>
            </div>
            
        
        </div>
    </div>`;
    
    
    
        if(resultBox.date ){
                console.log(search);
                document.getElementById('l-result').innerHTML=search;
            
        }
        else{
            console.log('fuck');
            document.getElementById('b-search__alert').textContent='※日程を入力してください';
        }

        
        
        })
    
    
});
