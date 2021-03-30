
import $ from 'jquery'
import Slick from 'slick-carousel'

export default ({ app }, inject) => {
	inject('slickSlider', Slick)
}