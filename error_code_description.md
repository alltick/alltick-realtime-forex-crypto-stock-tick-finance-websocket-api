> [English](./error_code_description.md) | [中文](./error_code_description_cn.md)

# Error Code Description

| Error Code | Error Msg                    | Meaning |
| ---------- | ---------------------------- | --------------------------------------------------------- |
| 200        | ok                           | Success |
| 400        | request header param invalid | JSON request first layer parameter error |
| 400        | request data param invalid   | Incorrect data field parameter in request JSON |
| 401        | token invalid                | Token is invalid |
| 402        | query invalid                | Request query param error |
| 429        | rate limit                   | Request frequency limit |
| 600        | code invalid                 | Request code product is invalid |
| 601        | body empty                   | The request message body data is empty |
| 603        | token level not enough       | The number of requested products or the number of K lines is greater than the token permission |
| 604        | code unauthorized            | Token does not have permission to request products|
| 605        | too many requests            | Request frequency limit |