var btn = document.querySelectorAll(".btn");
var sc = document.querySelector(".screen");
btn.forEach(e => {
    e.addEventListener("click", () => {
        let text = e.textContent
        if(text == "AC"){
            sc.innerHTML ="";
        }else if(text == "DEL"){
            sc.innerHTML = sc.textContent.substring(0, sc.textContent.length - 1);
        }else if(text == "="){
            sc.innerHTML = eval(sc.textContent);
        }else if(text == "+/-"){
            let sct1 = sc.textContent.substring(1,sc.textContent.length)
            let sct = sc.textContent;
            if(sct1.includes("+") || sct1.includes("-") || sct1.includes("/") || sct1.includes("*")){
                var i = sct.length
                for (i = sct.length; i >= 0; i--) {
                    if (sct[i] == "+" || sct[i] == "*" || sct[i] == "/" ||sct[i] == "-"){
                        break;
                    }
                }
                if(sct[i-1] === "("){
                    sc.innerHTML = sct.substring(0,i-1) + sct.substring(i+1,sct.length-1);
                }else if(sct[i] === "-"){
                    sc.innerHTML = sct.substring(0,i+1) + "(-" + sct.substring(i+1,sct.length) + ")"
                }else if(sct[i+1] != "-"){
                    sc.innerHTML = sct.substring(0,i+1) + "-" + sct.substring(i+1,sct.length);
                }else{
                    sc.innerHTML = sct.substring(0,i+1) + sct.substring(i+2,sct.length);
                }
            }else{
                if (sc.textContent[0] === "-"){
                    sc.innerHTML = sc.textContent.substring(1,sc.textContent.length);
                }else{
                    sc.innerHTML = "-" + sc.textContent;
                }
                
            }
        }else{
            sc.innerHTML += e.textContent;
        }
    })
});

function verify(t){
    let e = sc.innerHTML[sc.textContent.length - 1];
    if (sc.textContent == ""){
        sc.innerHTML = "";
    }else if (e == "+" || e == "-" || e == "/" || e == "*"){
        sc.innerHTML = sc.textContent.substring(0, sc.textContent.length - 1) + t.textContent;
    }else{
        sc.innerHTML += t.textContent;
    }
}