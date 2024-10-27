// Ruta para obtener los datos del usuario
app.get('/api/user/:userId', (req, res) => {
  const userId = req.params.userId;
  const query = 'SELECT id, name, email FROM users WHERE id = ?';
  
  connection.query(query, [userId], (err, results) => {
    if (err) {
      res.status(500).json({ error: 'Error al obtener los datos del usuario' });
      return;
    }
    if (results.length === 0) {
      res.status(404).json({ error: 'Usuario no encontrado' });
      return;
    }
    res.json(results[0]);
  });
});

// Modifica la ruta existente para obtener pedidos
app.get('/api/pedidos/:userId', (req, res) => {
  const userId = req.params.userId;
  const query = 'SELECT id, fecha, estado FROM pedidos WHERE user_id = ? ORDER BY fecha DESC';
  
  connection.query(query, [userId], (err, results) => {
    if (err) {
      res.status(500).json({ error: 'Error al obtener los pedidos' });
      return;
    }
    res.json(results);
  });
});