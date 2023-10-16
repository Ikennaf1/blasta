import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

let updateOptions = document.querySelector("#update_options");
let updateOptionsToggle = document.querySelector("#update_options_toggle");
updateOptionsToggle.onclick = () => {
    updateOptions.classList.toggle("hidden");
}
