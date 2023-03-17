// Created by Valencia 

var img = [

    "images/IMG-20210903-WA0017.jpg",
    "images/IMG-20210903-WA0018.jpg",
    "images/IMG-20210903-WA0016.jpg",
    "images/IMG-20210903-WA0015.jpg",
    "images/IMG-20210903-WA0019.jpg"
    ];
    
    var num = 0;
    var checking = false;
    var opp = 0;
    function slideForward(){  
        num++;
        
        if(num >= img.length){
            num = 0;
        }
        
        var imgBox= document.getElementById("imgBox");
        
        imgBox.style.transition= "all .2s ease-in-out";

        imgBox.style.backgroundImage= "url("+img[num]+")";
        // imgBox.style.opacity=opp;
       
        if(opp==0){
            imgBox.classList.add('mystyle');
            imgBox.classList.remove('mystyle2');
            opp++;
        }else if (opp==1){
            imgBox.classList.add('mystyle2');
            imgBox.classList.remove('mystyle');
            opp-=1;
        }
       
                
        // if (opp == 1){  
        //     imgBox.style.opacity='1'; 
        //     opp+=1;
        // }else if (opp == 2 ){
        //     imgBox.style.opacity='0'; 
        //     opp+=1;
        // }else if (opp == 3){
        //     imgBox.style.opacity='1';
        //     opp-=2; 
        // }  
        

       
    } 

    
    function checkNext(){
        if(checking){ 
           clearInterval(setTime);
        }
    }
    
  var setTime = setInterval(slideForward, 5000);