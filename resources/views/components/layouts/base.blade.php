<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>{{ $title ?? 'Page Title' }}</title>
    @laravelPWA
    @vite(['resources/css/app.css'])

    @vite(['resources/js/app.js'])
    <script>
        const setup = () => {
            const getTheme = () => {
                if (window.localStorage.getItem('dark')) {
                    return JSON.parse(window.localStorage.getItem('dark'))
                }

                return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
            }

            const setTheme = (value) => {
                window.localStorage.setItem('dark', value)
            }

            const getColor = () => {
                if (window.localStorage.getItem('color')) {
                    return window.localStorage.getItem('color')
                }
                return 'cyan'
            }

            const setColors = (color) => {
                // alert(color)
                const root = document.documentElement
                root.style.setProperty('--color-primary', color);
                root.style.setProperty('--color-primary-50', adjustOpacity(color, 0.1));
                root.style.setProperty('--color-primary-100', adjustOpacity(color, 0.2));
                root.style.setProperty('--color-primary-light', adjustOpacity(color, 0.5));
                root.style.setProperty('--color-primary-lighter', adjustOpacity(color, 0.7));
                root.style.setProperty('--color-primary-dark', darkenRgba(color, 0.8));
                root.style.setProperty('--color-primary-darker', darkenRgba(color, 0.6));

                this.selectedColor = color
                window.localStorage.setItem('color', color)
                //
            }
            // Utility function to adjust opacity of the rgba color
           const adjustOpacity = (color, opacity) => {
                const rgba = color.replace(/rgba?\(/, '').replace(/\)/, '').split(',');
                return `rgba(${rgba[0]}, ${rgba[1]}, ${rgba[2]}, ${opacity})`;
            }

            // Utility function to darken the RGBA color
           const darkenRgba = (color, factor) => {
                const rgba = color.replace(/rgba?\(/, '').replace(/\)/, '').split(',');
                const r = Math.floor(rgba[0] * factor);
                const g = Math.floor(rgba[1] * factor);
                const b = Math.floor(rgba[2] * factor);
                return `rgba(${r}, ${g}, ${b}, ${rgba[3] || 1})`;
            }

            const updateBarChart = (on) => {
                const data = {
                    data: randomData(),
                    backgroundColor: 'rgb(207, 250, 254)',
                }
                if (on) {
                    barChart.data.datasets.push(data)
                    barChart.update()
                } else {
                    barChart.data.datasets.splice(1)
                    barChart.update()
                }
            }

            const updateDoughnutChart = (on) => {
                const data = random()
                const color = 'rgb(207, 250, 254)'
                if (on) {
                    doughnutChart.data.labels.unshift('Seb')
                    doughnutChart.data.datasets[0].data.unshift(data)
                    doughnutChart.data.datasets[0].backgroundColor.unshift(color)
                    doughnutChart.update()
                } else {
                    doughnutChart.data.labels.splice(0, 1)
                    doughnutChart.data.datasets[0].data.splice(0, 1)
                    doughnutChart.data.datasets[0].backgroundColor.splice(0, 1)
                    doughnutChart.update()
                }
            }

            const updateLineChart = () => {
                lineChart.data.datasets[0].data.reverse()
                lineChart.update()
            }

            return {
                loading: true,
                sidebarOpen: false,
                isDark: getTheme(),
                toggleTheme() {
                    this.isDark = !this.isDark
                    setTheme(this.isDark)
                },
                setLightTheme() {
                    this.isDark = false
                    setTheme(this.isDark)
                },
                setDarkTheme() {
                    this.isDark = true
                    setTheme(this.isDark)
                },
                color: getColor(),
                selectedColor: 'cyan',
                setColors,
                toggleSidbarMenu() {
                    this.isSidebarOpen = !this.isSidebarOpen
                },
                isSettingsPanelOpen: false,
                openSettingsPanel() {
                    this.isSettingsPanelOpen = true
                    this.$nextTick(() => {
                        this.$refs.settingsPanel.focus()
                    })
                },
                isNotificationsPanelOpen: false,
                openNotificationsPanel() {
                    this.isNotificationsPanelOpen = true
                    this.$nextTick(() => {
                        this.$refs.notificationsPanel.focus()
                    })
                },
                isSearchPanelOpen: false,
                openSearchPanel() {
                    this.isSearchPanelOpen = true
                    this.$nextTick(() => {
                        this.$refs.searchInput.focus()
                    })
                },
                isMobileSubMenuOpen: false,
                openMobileSubMenu() {
                    this.isMobileSubMenuOpen = true
                    this.$nextTick(() => {
                        this.$refs.mobileSubMenu.focus()
                    })
                },
                isMobileMainMenuOpen: false,
                openMobileMainMenu() {
                    this.isMobileMainMenuOpen = true
                    this.$nextTick(() => {
                        this.$refs.mobileMainMenu.focus()
                    })
                },
                updateBarChart,
                updateDoughnutChart,
                updateLineChart,
            }
        }
    </script>
    @stack('js')
</head>
<body>
<div x-data="setup()" x-init="$refs.loading.classList.add('hidden'); setColors(color);" :class="{ 'dark': isDark}" x-cloak="none">
    @yield('body')
</div>

<script src="{{ asset('js/sa.js') }}"></script>
<x-livewire-alert::scripts />
</body>
</html>

