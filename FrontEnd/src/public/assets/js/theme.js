

// Theme change
(function () {
    const preferDark = window.matchMedia('(prefers-color-scheme: dark)').matches
    const preferTheme = (preferDark ? 'dark' : 'light')
    let theme = localStorage.getItem('theme')
    if (theme === 'null' || theme === 'system'){
        theme = preferTheme
        localStorage.setItem('theme', 'system')
    }
    setTheme(theme)

    // Событие на изменения темы в системе
    const themeMediaQuery = window.matchMedia('(prefers-color-scheme: dark)')
    themeMediaQuery.addEventListener('change', function (event) {
        if (localStorage.getItem('theme') === 'system'){
            const theme = (event.matches ? 'dark' : 'light')
            setTheme(theme)
        }
    })
})()


function setLightTheme() {
    setTheme('light')
    localStorage.setItem('theme', 'light')
}
function setDarkTheme() {
    setTheme('dark')
    localStorage.setItem('theme', 'dark')
}
function setSystemTheme() {
    const preferDark = window.matchMedia('(prefers-color-scheme: dark)').matches
    const preferTheme = (preferDark ? 'dark' : 'light')
    setTheme(preferTheme)
    localStorage.setItem('theme', 'system')
}
function setTheme(theme){
    document.body.classList.toggle('theme-dark', (theme === 'dark'))
}
// End theme change
