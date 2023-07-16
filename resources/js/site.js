// This is all you.
require('./prism.js')

import Alpine from 'alpinejs'
import persist from '@alpinejs/persist'

Alpine.plugin(persist)

Alpine.store('darkMode', {
    init() {
        this.on = window.matchMedia('(prefers-color-scheme: dark)').matches
    },

    on: Alpine.$persist(true).as('darkMode_on'),

    toggle() {
        this.on = ! this.on
    }
})

Alpine.start()


document.addEventListener('alpine:init', () => {
    Alpine.store('darkMode', {
        init() {
            this.on = window.matchMedia('(prefers-color-scheme: dark)').matches
        },

        on: Alpine.persist(false).as('darkMode_on'),

        toggle() {
            this.on = ! this.on
        }
    })
})
