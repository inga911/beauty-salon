import 'bootstrap';
import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// VOTE
document.querySelectorAll('.stars input')
.forEach(input => {
    input.addEventListener('change', _ => {
        const star = input.dataset.star;
        const isChecking = input.checked;

        if (isChecking) {
            input.closest('.stars').querySelectorAll('input')
            .forEach(s => s.dataset.star <= star ?  s.checked = true : s.checked = false);
        } else {
            input.closest('.stars').querySelectorAll('input')
            .forEach(s => s.dataset.star >= star ?  s.checked = false : s.checked = true);
        }
        input.closest('.stars').querySelectorAll('label')
        .forEach(l => l.classList.remove('half'));
    })
})