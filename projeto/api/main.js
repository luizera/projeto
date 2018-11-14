window.addEventListener('load', async ()=>{
    let lastClicked
    let categorias = await fetch('http://localhost/projeto/api/categoria/read.php')
    let containerzada = document.querySelector('div.posts > div > div:last-child')
    let containerzada1 = document.querySelector('div.posts > div')
    categorias = await categorias.json()
    let div = document.querySelector('div#categorias')
    for (let i = 0; i < categorias.length; i++) {
        if(i==0){
            lastClicked=document.createElement('div')
        }
        let el = document.createElement('div')
        el.dataset.value = categorias[i].id
        el.innerText = categorias[i].nome
        
        el.addEventListener('click', async (ev)=>{
            el.style.backgroundColor = "#43A047";
            lastClicked.style.backgroundColor='#1B5E20'
            lastClicked=el
            let container = document.querySelector('div.posts')
            let posts = await fetch('http://localhost/projeto/api/post/readCategoria.php?id='+el.dataset.value,
            {
                method: 'POST',
                body: JSON.stringify({id: el.dataset.value})
            })
            posts = await posts.json()

            container.innerHTML = ''

            for (let i = 0 ; i < posts.length; i++) {
                let x = document.createElement("div")
                let y = document.createElement("div")
                let z = document.createElement("div")
                y.innerText = posts[i].titulo
                x.dataset.value = posts[i].id
                z.innerText ="Texto: " + posts[i].texto + " Autor: " + posts[i].autor + " Data: " + posts[i].dt_criacao
                container.appendChild(x)
                x.appendChild(y)
                x.appendChild(z)
            }
        })
        div.appendChild(el)
    }
})
