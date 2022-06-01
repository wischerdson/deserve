let client = null
export const setClient = ($axios) => client = $axios


export const getSurvey = (surveyType, projectAlias) => client.get(`/surveys/${surveyType}/${projectAlias}`)
export const saveSurveyFields = data => client.post('/surveys/fields', data)
export const getProjects = () => client.get('/surveys/projects')
export const setProjectStatus = data => client.post('/surveys/projects/setStatus', data)
export const createProject = data => client.post('/surveys/projects/create', data)
