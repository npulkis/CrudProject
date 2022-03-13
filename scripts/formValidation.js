function title_validation(){
    'use strict';
    let title_value = document.getElementById("title").value;
    let titleLength = title_value.length
    if(titleLength< 4 || titleLength> 20)
    {
        document.getElementById('titleCheck').className= "invalid-feedback d-block"
        document.getElementById('titleCheck').innerHTML = 'Must be between 4 and 20 characters';
        document.getElementById("title").focus();

    }
    else
    {
        document.getElementById('titleCheck').className= "valid-feedback d-block"
        document.getElementById('titleCheck').innerHTML = 'Valid!';
    }
}

function caption_validation(){
    'use strict';
    let caption_value = document.getElementById("caption").value;
    let captionLength = caption_value
    if(captionLength < 20 || captionLength > 512)
    {
        document.getElementById('captionCheck').className= "invalid-feedback d-block"
        document.getElementById('captionCheck').innerHTML = 'Must be between 20 and 512 characters';
        document.getElementById("caption").focus();

    }
    else
    {
        document.getElementById('captionCheck').className= "valid-feedback d-block"
        document.getElementById('captionCheck').innerHTML = 'Valid!';
    }
}

function tag_validation(){
    'use strict';
    let tag_value = document.getElementById("tag").value;
    let tagLength = tag_value.length
    if(tagLength< 3 || tagLength> 20)
    {
        document.getElementById('tagCheck').className= "invalid-feedback d-block"
        document.getElementById('tagCheck').innerHTML = 'Must be between 3 and 20 characters';
        document.getElementById("tag").focus();

    }
    else
    {
        document.getElementById('tagCheck').className= "valid-feedback d-block"
        document.getElementById('tagCheck').innerHTML = 'Valid!';
    }
}