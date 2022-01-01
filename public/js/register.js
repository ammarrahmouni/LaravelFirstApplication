var profilePic = document.getElementById('image'); /* finds the input */

function changeLabelText() {
    var profilePicValue = profilePic.value; /* gets the filepath and filename from the input */
    var fileNameStart = profilePicValue.lastIndexOf('\\'); /* finds the end of the filepath */
    profilePicValue = profilePicValue.substr(fileNameStart + 1); /* isolates the filename */
    var profilePicLabelText = document.querySelector('label[for="inputGroupFile01"]'); /* finds the label text */
    if (profilePicValue !== '') {
        profilePicLabelText.textContent = profilePicValue; /* changes the label text */
    }
}

profilePic.addEventListener('change',changeLabelText,false); /* runs the function whenever the filename in the input is changed */