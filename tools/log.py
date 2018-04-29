from lib.core.enums import PRIORITY
def tamper(payload, **kwargs):
  file("payload.log","a").write(payload+"\n")
  retVal = payload
  return retVal
