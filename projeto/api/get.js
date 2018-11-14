window.addEventListener('load', async ()=>{
    let boolean = false;
    let posts = await fetch('http://localhost/projeto/api/post/read.php')
    posts = await posts.json()
    let div = document.querySelector('div.posts')
    for (let i = 0; i < posts.length; i++) {
        let el = document.createElement('div')
        let el2 = document.createElement('div')
        let el3 = document.createElement('div')
        let texto = document.createElement('div')
        let autor = document.createElement('div')
        let data = document.createElement('div')
        el.dataset.value = posts[i].id
        el2.innerText = posts[i].titulo
        texto.innerText ="Texto: " + posts[i].texto 
        autor.innerText += " Autor: " + posts[i].autor
        data.innerText += " Data: " + posts[i].dt_criacao
        div.appendChild(el)
        el.appendChild(el2)
        el.appendChild(el3)
        el3.appendChild(texto)
        el3.appendChild(autor)
        el3.appendChild(data)
    }
})
