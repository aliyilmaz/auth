/**
 *
 * @package    mind.js
 * @version    Release: 1.1.6
 * @license    GPL3
 * @author     Ali YILMAZ <aliyilmaz.work@gmail.com>
 * @category   Javascript Framework, Basic web development kit.
 * @link       https://github.com/aliyilmaz/mind.js
 *
 */

 function getLocation(element='', callback) {

    if (navigator.geolocation) {
        
        navigator.geolocation.getCurrentPosition(function(position){
            
            let coordinates = position.coords.latitude+','+position.coords.longitude;
            
            changeContent(element, coordinates);

            if(callback) callback(position);
        });
    } else { 
        console.log("Geolocation is not supported by this browser.");
    }
 }

function actionGet(url, callback) {

    var xhttp = new XMLHttpRequest();

    // Set GET method and ajax file path
    xhttp.open("GET", url, true);

    // call on request changes state
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if(callback) callback(this.responseText);
        }
    };

    xhttp.send(null);
    
} 

function actionPost(url, element, callback) {

    const xhttp = new XMLHttpRequest();
    const data = new FormData(document.querySelector(element));

    // Set POST method and ajax file path
    xhttp.open("POST", url, true);

    // call on request changes state
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            if(callback) callback(this.responseText);
        }
    };

    // Send request with data
    xhttp.send(data);

}

function redirect(url, delay=0, element=''){

    let wait = 0,
        inter = null;

    if(element != ''){
        wait = 1000;
    } 
    
    inter = setInterval(function () {
        if(delay === 0){
            clearInterval(inter);
            location.replace(url);
        } else {
            changeContent(element, delay);
        }
        delay--;
    }, wait);
    
}

function listening(callback, delay = 0.1) {
    if(callback) callback(callback);
    window.setInterval(function(){
        if(callback) callback(callback);
    }, delay);
}

function appendItem(element, value){
    let elements = document.querySelectorAll(element);
    if(elements.length >= 1){

        elements.forEach(function(element) {
            if(element.value === undefined){
                element.innerHTML += value;
            } else {
                element.value += value;
            }
        });
    }
}

function changeContent(element, value){
    let elements = document.querySelectorAll(element);
    if(elements.length >= 1){

        elements.forEach(function(element) {
            if(element.value === undefined){
                element.innerHTML = value;
            } else {
                element.value = value;
            }
        });
    }
}

function copyItem(element, where) {
    
    let elements = document.querySelectorAll(element);
    let wheres = document.querySelectorAll(where);
    if(elements.length >= 1){

        elements.forEach(function (element) {
            
           // for select start
            if (element.tagName === 'SELECT') {
                let z = element.querySelectorAll('option');
                z.forEach(function (f) {
                    if (f.selected) {
                        f.setAttribute('selected', true);
                    } else {
                        f.removeAttribute('selected');
                    }
                });
            } else {
                let x = element.querySelectorAll('select');
                x.forEach(function (y) {
                    let z = y.querySelectorAll('option');
                    z.forEach(function (f) {
                        if (f.selected) {
                            f.setAttribute('selected', true);
                        } else {
                            f.removeAttribute('selected');
                        }
                    });
                });
            }
            // for select end
            
            if (wheres.length >= 1) {
                wheres.forEach(function (where) {
                    where.appendChild(element.cloneNode(true));
                });
            }
        });
    }
}

function itemSetAttr(element, name, value){
    let elements = document.querySelectorAll(element);
    for(var i = 0; i<elements.length; i++){
        elements[i].setAttribute(name, value);
    };
}

function hideItem(element, callback){
    let elements = document.querySelectorAll(element);
    for(var i = 0; i<elements.length; i++){
        
        if(elements[i] !== undefined){
            elements[i].style.visibility = "hidden";
            if(callback) callback(this);
        }

    };
}

function showItem(element, callback){
    let elements = document.querySelectorAll(element);
    for(var i = 0; i<elements.length; i++){
      
        if(elements[i] !== undefined){
            elements[i].style.visibility = "visible";
            if(callback) callback(this);
        }
        
    };
}

function removeItem(element, callback){
    let elements = document.querySelectorAll(element);
    for(var i = 0; i<elements.length; i++){
      
        if(elements[i] !== undefined){
            elements[i].remove();
            if(callback) callback(this);
        }
    
    };
}

function clickItem(element, callback){
    let buttons = document.querySelectorAll(element);
    for(var i = 0; i<buttons.length; i++){
        
        buttons[i].addEventListener('click', (e) => {   
            if(callback) callback(e.target);
        });

    };
}

function keyupItem(element, callback){
    let elements = document.querySelectorAll(element);
    for(var i = 0; i<elements.length; i++){
        
        elements[i].addEventListener('keyup', (e) => {   
            if(callback) callback(e.target);
        });

    };
}

function changeItem(element, callback) {
    let items = document.querySelectorAll(element);
    for(var i = 0; i<items.length; i++){
        
        items[i].addEventListener('change', (e) => {   
            if(callback) callback(e.target);
        });

    };
}

function formReset(element, callback){

    let elements = document.querySelectorAll(element);
    
    if(elements.length >= 1){

        elements.forEach(function(element) {
            element.reset();
        });
    }
    if(callback) callback(this);
}

function charCounter(scheme, callback) {

    let elements = document.querySelectorAll(scheme.element);
    for (var i = 0; i < elements.length; i++){
        
        itemSetAttr(scheme.element, 'maxlength', scheme.limit);
        
        elements[i].addEventListener('keyup', (e) => {   
            totalChar = e.target.value.length;
            if(totalChar <= scheme.limit){
                if (callback) callback(scheme.limit-totalChar);
            }
        });

    };
    
    if (callback) callback(scheme.limit);
}

function foreachArray(object, callback){
    
    if(is_json(object)){
        object = JSON.parse(object);
    }

    if(is_array(object)){
        object = Object.assign({}, object);
    }

    if(is_object(object)){

        for(var prop in object) {
            if(object.hasOwnProperty(prop)) {
                callback(prop, object[prop]);
            }
        }

    } else {
        console.log('Only arrays, objects and json can be processed.');
    }

}

function is_array(obj){
    if(Array.isArray(obj)){
        return true;
    } else {
        return false;

    }
}

function is_json(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}

function is_object(item){
    if( Object.prototype.toString.call(item) === '[object Object]' ){
        return true;
    } else {
        return false;
    }
}

function internet() {
    let status = true;
    
    if (navigator.onLine === true) {
        status = true;
    } else {
        status = false;
    }
    return status;
}

