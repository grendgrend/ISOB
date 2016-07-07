import abstructFilter from './galleryFilter.js';

/* Класс фильтров по тегам */

export default class tagFilter extends abstructFilter{
    constructor (event,selector,selectorType){
        super(event,selector,selectorType);
        this.currentTags=[];
        self=this;
        this.className='tagFilter';
    }
    setCurrentValue (event){
        var result=true;
        this.currentTags.forEach(function(item,i){
           if (item==event.currentTarget.innerHTML){
               self.unsetTag(i);
               result=false;
               return false;
           }
        });
        if (result) {
            this.currentTags.push(event.currentTarget.innerHTML);
        }
        result ? event.currentTarget.style.border="1px dashed #000f1e" : event.currentTarget.style.border="none";
        console.log(this.currentTags);
    }
    unsetTag (i){//Принимает номер элемента массива, который нужно удалить, применяется для повторного клика по тегу
        this.currentTags.splice(i,1);
    }
    getCurrentValue(){
        return this.currentTags;
    }
}