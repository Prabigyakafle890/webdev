
let currentSlide=0;

function showSlide(index){
const slide= document.getElementsByClassName('slides')[0];
const totalSlides= document.getElementsByClassName('slide').length


if(index>=totalSlides){
    currentSlide=0;
}
else if(index<0){
    currentSlide=totalSlides-1;
}
else{
    currentSlide=index;
}





slide.style.transform= `translateX(-${currentSlide*100}%)`;
}

function nextSlide(){
    showSlide(currentSlide+1);
}

function prevSlide(){
    showSlide(currentSlide-1);
}

document.querySelector('.next-btn').addEventListener('click',nextSlide);
document.querySelector('.prev-btn').addEventListener('click',prevSlide);