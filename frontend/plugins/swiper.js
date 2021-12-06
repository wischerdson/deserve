import { Swiper, Navigation, Pagination } from 'swiper'

export default ({ app }, inject) => {
	Swiper.use([ Navigation, Pagination ])
	inject('swiper', Swiper)
}
