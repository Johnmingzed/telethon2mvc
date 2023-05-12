/**
 * @author Jonathan
 */
// ===============
// Espace modification

// ===============
//watch changes in picture file input
let f = document.getElementById('picture');//picture file input

if(f){
    
    f.onchange=function(e){        
        let file=f.files[0];        
        let reader = new FileReader();        
        reader.onload = function (e) {
            var dataURL = e.target.result;                
            console.log(dataURL);
            document.getElementById('standsPic').src=dataURL;
        };
        
        reader.readAsDataURL(file);
        console.log(e);
    };
}

console.log('stands.js');