class Clerk {
     constructor() {
         var _listOfAmount = [];
     }

    set addData(amount){
        _listOfAmount.push(amount);
    }

    getData(){
        return this._listOfAmount;
    }
}
