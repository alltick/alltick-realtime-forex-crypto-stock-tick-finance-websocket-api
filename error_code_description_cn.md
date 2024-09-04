> [English](./error_code_description.md) | [中文](./error_code_description_cn.md)

# 错误码说明

| 错误码 | 错误内容                      | 含义 |
| ------ | ---------------------------- | ---------------------------- |
| 200    | ok                           | 成功 |
| 400    | request header param invalid | 请求JSON第一层参数错误 |
| 400    | request data param invalid   | 请求JSON中data字段参数错误 |
| 401    | token invalid                | token无效 |
| 402    | query invalid                | 请求的query参数错误 |
| 429    | rate limit                   | 请求频率限制 |
| 600    | code invalid                 | 请求code产品无效 |
| 601    | body empty                   | 请求消息体数据为空 |
| 604    | code unauthorized            | token没有请求产品的权限 |
| 605    | too many requests            | 请求频率限制 |