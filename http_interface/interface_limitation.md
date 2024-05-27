> [English](./interface_limitation.md) | [中文](./interface_limitation_cn.md)

# HTTP Interface Restrictions

## HTTP Interface Restriction 1 - IP Class Restriction (The limitations of the free trial package written here will be adjusted according to the package after payment.)

Multiple requests from the same IP are subject to specific limits determined by the interface, with no mutual interference.

- /kline: Only 1 request is allowed every 10 seconds.
- /depth-tick: Only 1 request is allowed per second.
- /trade-tick: Only 1 request is allowed per second.

### Example:
- IP A makes a request to the /kline interface to query K-line data at 14:03:01, and also makes a request to the /trade-tick interface to query trade tick data once within the same minute. The backend service provides normal responses for both requests.
- IP A makes two requests to the /kline interface to query K-line data at 14:03:01. The backend service provides normal responses for the first request, but gives an error response for the second request.

## HTTP Interface Restriction 2 - Connection Limitation(The limitations of the free trial package written here will be adjusted according to the package after payment.)

To avoid excessive requests causing excessive pressure on backend services, the maximum connection limit for the stock API is set to 100. This limit may be adjusted based on the subsequent performance of the service. Requests exceeding this limit will be disconnected directly.

## HTTP Interface Restriction 3 - K-Line Query Limitation (The limitations of the free trial package written here will be adjusted according to the package after payment.)

Only one code's K-line can be queried at a time, and a maximum of 1000 K-lines can be queried at once. For queries exceeding 1000 K-lines, only the first 1000 will be returned.

## HTTP Interface Restriction 4 - Quote Query Limitation (The limitations of the free trial package written here will be adjusted according to the package after payment.)

A maximum of 5 codes can be queried in a single request. For queries exceeding 5 codes, only the first 5 will be processed.
