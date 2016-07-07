export default class filterCollection {
    constructor (){
        this.filters=[];
        this.initFilters(arguments);
    }
    initFilters (arr) {
        for (var i=0; i<arr.length; i+=2){
            var filter=new arr[i](arr[i+1][0], arr[i+1][1], arr[i+1][2]);
            this.filters[filter.className]=filter;
            (filter.selectorType == 'id') ? this.setEventWithId(this.filters[filter.className]):this.setEventWithClass(this.filters[filter.className]) ;
        }
    }
    setEventWithId (value) {
        document.getElementById(value.selector).addEventListener(value.event, function(event){value.setCurrentValue(event)});
    }
    setEventWithClass (value){
        var arr = document.getElementsByClassName(value.selector);
        for (var i=0; i<arr.length; i++){
            arr[i].addEventListener(value.event, function(event){value.setCurrentValue(event)});
        }
    }
}