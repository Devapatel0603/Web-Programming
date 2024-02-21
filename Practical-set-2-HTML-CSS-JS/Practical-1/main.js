var btn = document.querySelectorAll(".btn")
var sc = document.querySelector(".screen")
btn.forEach(e => {
    e.addEventListener("click", () => {
        if(e.textContent == "AC"){
            sc.innerHTML ="";
        }else if(e.textContent == "DEL"){
            sc.innerHTML = sc.textContent.substring(0, sc.textContent.length - 1);
        }else{
            sc.innerHTML += e.textContent
        }
    })
});

function calc(){
    sc.innerHTML = eval(sc.textContent);
}