/**
 * @author Pierre
 */
// ===============
// Espace modification
// Modifier par : Jonathan Courtois le 11/05/2023 à 16h10
// ===============
//watch changes in picture file input
let f=document.getElementById('picture');//picture file input

if(f){
    
    f.onchange=function(e){        
        let file=f.files[0];        
        let reader = new FileReader();        
        reader.onload = function (e) {
            var dataURL = e.target.result;                
            console.log(dataURL);
            document.getElementById('profilepic').src=dataURL;
        };
        
        reader.readAsDataURL(file);
        console.log(e);
    };
}

console.log('users.js');