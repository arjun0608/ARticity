const imgDiv = document.querySelector('.r-bottom');
const img = document.querySelector('#photo');
const file = document.querySelector('#file');
const uploadebtn = document.querySelector('#uploadbtn');

file.addEventListener('change', function () {
    const chosedfile = this.files[0];

    if (chosedfile) {
        const reader = new FileReader();

        reader.addEventListener('load', function () {
            img.setAttribute('src', reader.result);
        })
        reader.readAsDataURL(chosedfile);
    }
})