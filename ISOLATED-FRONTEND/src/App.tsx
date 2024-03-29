import './App.css'
import ws from './services/websocket'



function App() {

  ws.channel("channelTest").listen("TestingReverb", (e) => {
    console.log(e)
  })


  return (
    <>
    teeste
    </>
  )
}

export default App
