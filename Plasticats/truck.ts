/// <reference path="vehicle.ts" />


/**
 * Truck
 */
class Truck extends vehicle {
    
    public x:number;
    public y:number;
    public width:number;
    public height:number;
    
   

    constructor(l:Level) {
        super();
        this.level = l;
        
        this.div = document.createElement("truck");
        this.level.div.appendChild(this.div);
        
        this.x = -280;
        this.y = 80;
        this.width = 281;
        this.height = 155;
    }
    
    public update() : void {
        this.x++;
    }
   
    
}