const UserDashboard = () => {
    const [user, setUser] = React.useState(null);
    const [trackingCode, setTrackingCode] = React.useState('');
    const [trackingResult, setTrackingResult] = React.useState(null);
    const [orders, setOrders] = React.useState([]);
  
    React.useEffect(() => {
      // Simular la obtención de datos del usuario
      setUser({ id: 1, name: 'John Doe' });
      
      // Simular la obtención de pedidos
      setOrders([
        { id: 1, fecha: '2023-05-01', estado: 'Entregado' },
        { id: 2, fecha: '2023-05-15', estado: 'En tránsito' },
        { id: 3, fecha: '2023-05-30', estado: 'Procesando' },
      ]);
    }, []);
  
    const handleTracking = () => {
      // Simular el rastreo de un paquete
      setTrackingResult({
        codigo: trackingCode,
        estado: 'En tránsito',
        ubicacion: 'Centro de distribución',
        fechaEstimadaEntrega: '2023-06-15'
      });
    };
  
    return (
      <div className="user-dashboard">
        <h3>Bienvenido, {user?.name}</h3>
        
        <div className="tracking-section">
          <h4>Rastrear Paquete</h4>
          <input
            type="text"
            value={trackingCode}
            onChange={(e) => setTrackingCode(e.target.value)}
            placeholder="Ingrese código de rastreo"
          />
          <button onClick={handleTracking}>Rastrear</button>
          
          {trackingResult && (
            <div className="tracking-result">
              <h5>Resultado del rastreo:</h5>
              <p>Código: {trackingResult.codigo}</p>
              <p>Estado: {trackingResult.estado}</p>
              <p>Ubicación: {trackingResult.ubicacion}</p>
              <p>Fecha estimada de entrega: {trackingResult.fechaEstimadaEntrega}</p>
            </div>
          )}
        </div>
        
        <div className="order-history">
          <h4>Historial de Pedidos</h4>
          <table>
            <thead>
              <tr>
                <th>ID Pedido</th>
                <th>Fecha</th>
                <th>Estado</th>
              </tr>
            </thead>
            <tbody>
              {orders.map(order => (
                <tr key={order.id}>
                  <td>{order.id}</td>
                  <td>{order.fecha}</td>
                  <td>{order.estado}</td>
                </tr>
              ))}
            </tbody>
          </table>
        </div>
      </div>
    );
  };
  
  ReactDOM.render(<UserDashboard />, document.getElementById('user-dashboard'));