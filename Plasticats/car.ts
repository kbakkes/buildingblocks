/// <reference path="vehicle.ts" />


/**
 * Car
 */
class Car extends vehicle {
    
    

    constructor(l:Level) {
        super(); 
        this.level = l;
       
        this.div = document.createElement("car");
        this.level.div.appendChild(this.div);
        
        this.x = -168;
        this.y = 300;
        this.width = 168;
        this.height = 108;
    }
    
    public update() : void {
        this.x+=2;
    }
    
    public draw() : void {
        this.div.style.transform = "translate("+this.x+"px, "+this.y+"px)";
    }
    
 
    
    
}