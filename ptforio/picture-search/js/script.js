
document.querySelector('a[href="#l-pictures"]').addEventListener('click', function (event) {
    
    event.preventDefault();

    
    const targetElement = document.querySelector(this.getAttribute('href'));
    if (targetElement) {
        targetElement.scrollIntoView({ behavior: 'smooth' });
    }
});

let search=document.getElementsByClassName('b-search__box')[0];
async function displayPicture(){
    const response=await fetch(`https://pixabay.com/api/?key=27574335-95303cfd66881783b5febff59&q=${search.value}&per_page=100`);
    const data=await response.json();
    
    for(  let i of data.hits){
        document.getElementById('b-pictures').insertAdjacentHTML('afterbegin',`<img src="${i.previewURL}" class="b-pictures__item"></img>`);
    }
    if(document.getElementById('b-pictures').innerHTML===''){
        document.getElementById('b-pictures').insertAdjacentHTML('afterbegin',`<p>一致する画像が見つかりませんでした</p>`);
    }
    

}

document.getElementsByClassName('b-search__button')[0].addEventListener('click',function(){
    
    if(search.value){
        document.getElementById('l-pictures').innerHTML=`<h2 class="result-name">「${search.value}」の検索結果</h2><div class="b-pictures" id="b-pictures"></div>`;
        
       
        displayPicture();
        
    }else{
        console.log('入ってない');
    }
})