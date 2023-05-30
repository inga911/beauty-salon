import 'bootstrap';
import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


// document.addEventListener('DOMContentLoaded', function () {
//     const specialistId = '{{ $specialist->id }}';
//     const url = '{{ route("specialist-salon-name") }}';
//     const assignedSalonElement = document.getElementById('assigned-salon');

//     fetch(`${url}/${specialistId}`)
//         .then(response => response.json())
//         .then(data => {
//             if (data.salonName) {
//                 assignedSalonElement.textContent = data.salonName;
//             } else {
//                 assignedSalonElement.textContent = 'Not assigned';
//             }
//         })
//         .catch(error => {
//             console.error('Error:', error);
//         });
// });