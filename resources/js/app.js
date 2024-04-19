import './bootstrap'

// import Alpine from 'alpinejs' // this is unactivated to make livewire work properly because livewire already has alpine js on it
import collapse from '@alpinejs/collapse'
import PerfectScrollbar from 'perfect-scrollbar'
import flatpickr from "flatpickr";
import TomSelect from "tom-select";

// livewire powergrid datatable
import './../../vendor/power-components/livewire-powergrid/dist/powergrid'
import './../../vendor/power-components/livewire-powergrid/dist/tailwind.css'

window.PerfectScrollbar = PerfectScrollbar
window.TomSelect = TomSelect

document.addEventListener('alpine:init', () => {
    Alpine.data('mainState', () => {
        let lastScrollTop = 0
        const init = function () {
            window.addEventListener('scroll', () => {
                let st =
                    window.pageYOffset || document.documentElement.scrollTop
                if (st > lastScrollTop) {
                    // downscroll
                    this.scrollingDown = true
                    this.scrollingUp = false
                } else {
                    // upscroll
                    this.scrollingDown = false
                    this.scrollingUp = true
                    if (st == 0) {
                        //  reset
                        this.scrollingDown = false
                        this.scrollingUp = false
                    }
                }
                lastScrollTop = st <= 0 ? 0 : st // For Mobile or negative scrolling
            })
        }

        const getTheme = () => {
            if (window.localStorage.getItem('dark')) {
                return JSON.parse(window.localStorage.getItem('dark'))
            }
            return (
                !!window.matchMedia &&
                window.matchMedia('(prefers-color-scheme: dark)').matches
            )
        }
        const setTheme = (value) => {
            window.localStorage.setItem('dark', value)
        }
        return {
            init,
            isDarkMode: getTheme(),
            toggleTheme() {
                this.isDarkMode = !this.isDarkMode
                setTheme(this.isDarkMode)
            },
            isSidebarOpen: window.innerWidth > 1024,
            isSidebarHovered: false,
            handleSidebarHover(value) {
                if (window.innerWidth < 1024) {
                    return
                }
                this.isSidebarHovered = value
            },
            handleWindowResize() {
                if (window.innerWidth <= 1024) {
                    this.isSidebarOpen = false
                } else {
                    this.isSidebarOpen = true
                }
            },
            scrollingDown: false,
            scrollingUp: false,
        }
    })
})

Alpine.plugin(collapse)
// Alpine.start()
