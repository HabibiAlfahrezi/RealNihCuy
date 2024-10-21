import './bootstrap';
import Alpine from 'alpinejs'
import persist from '@alpinejs/persist'

// Initialize Alpine
Alpine.plugin(persist)
window.Alpine = Alpine
Alpine.start()