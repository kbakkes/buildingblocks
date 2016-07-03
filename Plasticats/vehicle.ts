/**
 * vehicle
 */
class vehicle {
    
    protected div: HTMLElement; 
    
    public x:number;
    public y:number; 
    public width:number;
    public height:number;
    public vehicleType:string; 
    public level:Level;
    
    constructor() {
       
        
       
    }
    
    public draw(): void{ 
        this.div.style.transform = "translate("+this.x+"px, "+this.y+"px)";
    }
    
    
    public getX():number{ 
        return this.x;
    }
    
    public getY():number{ 
        return this.y; 
    }
    
}