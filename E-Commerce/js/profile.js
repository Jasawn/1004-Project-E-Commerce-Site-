$(document).ready(function ()
{
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus');
    });
    document.getElementById("randomisePicture").addEventListener("click", randomisePicture);
});

function randomisePicture()
{
    var imgDiv = document.getElementById("profileImageDiv");
    var currentNum = Math.floor(Math.random() * 10) + 1;
    var imgSrcChange = "profileImages/" + currentNum + ".png";
    imgDiv.innerHTML = '<img src="' + imgSrcChange + '" alt="ProfileImage" class="" id="ProfileImage">';
}


function updateImage() {
    const imgSrc = document.getElementById("ProfileImage").getAttribute('src');
    window.location.href = "process_profile.php?imgSrc=" + imgSrc;
}

