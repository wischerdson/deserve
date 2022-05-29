let client = null
export const setClient = ($axios) => client = $axios


export const getSurvey = (surveyType, projectAlias) => client.get(`/surveys/${surveyType}/${projectAlias}`)
export const saveSurveyFields = data => client.post('/surveys/fields', data)
