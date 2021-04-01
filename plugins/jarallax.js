
import { jarallax, jarallaxVideo } from 'jarallax';

export default ({ app }, inject) => {
	jarallaxVideo()
	inject('jarallax', jarallax)
}