class Clerk {
    _listOfAmount = [];
     constructor() {
        
     }

    set addData(amount){
        _listOfAmount.push(amount);
    }

    getData(){
        return this._listOfAmount;
    }
}
