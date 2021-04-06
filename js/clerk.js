class Clerk {
    #listOfAmount = [];
     constructor() {
        
     }

    set addData(amount){
        this.#listOfAmount.push(amount);
    }

    getData(){
        return this.#listOfAmount;
    }
}
