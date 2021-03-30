
import SmoothScroll from 'smooth-scroll'

export default ({ app }, inject) => {
  // Inject $hello(msg) in Vue, context and store.
  inject('smoothScroll', SmoothScroll)
}