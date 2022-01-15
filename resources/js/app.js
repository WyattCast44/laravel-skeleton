import Alpine from 'alpinejs'
import focus from '@alpinejs/focus'
import persist from '@alpinejs/persist'
import collapse from '@alpinejs/collapse'
import intersect from '@alpinejs/intersect'
 
window.Alpine = Alpine

Alpine.plugin(focus)
Alpine.plugin(persist)
Alpine.plugin(collapse)
Alpine.plugin(intersect)
Alpine.start()