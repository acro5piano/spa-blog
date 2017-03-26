import marked from 'marked'
import hljs from 'highlight.js'

export default (text) => {
  marked.setOptions({
    highlight: function (code) {
      return hljs.highlightAuto(code).value
    }
  })
  return marked(text || '')
    .replace(/<h3/g, '<h4')
    .replace(/<h2/g, '<h3')
    .replace(/<h1/g, '<h2')
}
