class Clerk {
    #listOfAmount = [];
     constructor() {
        
     }

    addData(amount){
        this.#listOfAmount.push(amount);
    }

    getData(){
        return this.#listOfAmount;
    }

    resetData(){
        this.#listOfAmount = [];
    }
}
