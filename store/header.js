
export const state = () => ({
	transparent: false
})

export const mutations = {
	transparent (state, payload) {
		state.transparent = payload
	}
}