let intro = document.querySelector('.Transition');
let logo = document.querySelector('.Transition-text');
let logoSpan = document.querySelectorAll('.Transition-Animation');

window.addEventListener('DOMContentLoaded', () =>{

  setTimeout (() => {

    logoSpan.forEach((span, idx) =>{
        setTimeout(() =>{
            span.classList.add('active');
        }, (idx + 1) * 400)
    });

    setTimeout(() =>{
        logoSpan.forEach((span, idx) =>{
            setTimeout(() =>{
              span.classList.remove('active');
              span.classList.add('fade');

            }, (idx + 1) * 50)
        })
    }, 2000);

    setTimeout(() =>{
      intro.style.top = '-128vh';
    }, 2300)

  })

})

{
    function toggleMenu() {
        const nav = document.querySelector('.navigation');
        nav.classList.toggle('active');
    }

}

