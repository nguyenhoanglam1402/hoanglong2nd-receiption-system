class Clerk {
     constructor() {
         var _listOfAmount = [];
     }

    set addData(amount){
        _listOfAmount.push(amount);
    }

    get getData(){
        return this._listOfAmount;
    }
}
